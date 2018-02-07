if ( XMLHttpRequest.prototype.sendAsBinary === undefined ) {
    XMLHttpRequest.prototype.sendAsBinary = function(string) {
        var bytes = Array.prototype.map.call(string, function(c) {
            return c.charCodeAt(0) & 0xff;
        });
        this.send(new Uint8Array(bytes).buffer);
    };
}

function _base64ToArrayBuffer(base64) {
    var binary_string =  window.atob(base64);
    var len = binary_string.length;
    var bytes = new Uint8Array( len );
    for (var i = 0; i < len; i++)        {
        bytes[i] = binary_string.charCodeAt(i);
    }
    return bytes.buffer;
}

function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    var byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ia], {type:mimeString});
}


$(function() {
    $("#submit-data").click(function() {
    $("#copy-text").val('');
    var response = grecaptcha.getResponse();
        if(response){
            $(this).button("loading");
            $(".draggable").css("border","0");
            $(".rotate-ctr").css("border","0");
            $("#myImg").css("border-radius","0");
            $(".step-num").css("display","none");
            $(".ui-rotatable-handle").hide();
            $("#click-upload").css("background-color","rgba(255, 255, 255, 0)");
            $(".meme-step").css({"border-style":"none","border-radius":"0"});
            $("#draggable-text").css({"border-style":"none","word-wrap":"break-word"});
        
            var ga = {event_category: "Submit button", action: "eo_clicked", event_label: "Submit button clicked", event_value: 1};
            eoAnalytics.pageEvent(ga);

            html2canvas([document.getElementById('printed')], {
                useCORS: true,
                logging:true,
                noCache:true,
                onrendered: function (canvas) {
                    var data = canvas.toDataURL('image/png',1.0);
                    var binImg = _base64ToArrayBuffer(data.replace('data:image/png;base64,', ''));
                    var bin = new Uint8Array(binImg);
                    var ts = new Date().getTime();
                    var fileName = document.getElementById('img-out').getAttribute("img-file").split(".");
                    fileName[0] = fileName[0].replace(new RegExp(' ', 'g'), "");
                    fileName[0] = fileName[0] == "" ? ts : fileName[0];
                    // console.log(canvas.toBlob());
                    var fd = new FormData();
                    fd.append("filename", fileName[0]);
                    fd.append("author_email", $("#email").val());
                    fd.append("g-recaptcha-response", $("#g-recaptcha-response").val());

                    var blob = dataURItoBlob(data);
                    var sendUrl = is_live ? 'http://apps.gmanetwork.com/news/executive_optical/upload_image?search_it' : 'http://apps.tgmanetwork.com/news/executive_optical/upload_image?search_it';
                    fd.append("source", blob);
                    $.ajax({
                        type: 'POST',
                        url: sendUrl,
                        data: fd,
                        processData: false,
                        contentType: false,
                        dataType: "json"
                    }).done(function(res) {
                        if(res.status == 1){
                            alert("Upload success! Kindly wait a few moments for your meme to appear in the gallery.");
                            $("#email").val('');
                            document.location.href = base_url + "mayforeversaeo/gallery";
                        } else {
                            alert("Upload failed!");
                            document.location.reload();
                        }
                    });
        }
    });
}else{
    alert("Please verify recaptcha");
}
    });
}); 


