jQuery(document).ready(function(){
    jQuery('.interested_link').on('click', function(){
        var jobid = jQuery(this).data('jobid');
        var userid = jQuery(this).data('userid');
        
        alert(jobid);
    });
})

function showToast(message, type)
{
    if (type == "error")
    {
        toastr.error(message, '', 
                    {
                        timeOut: 5000,
                        closeButton: true,
                        closeEasing: 'swing',
                        progressBar: true
                    });
    }
    else
    {
        toastr.success(message, '', 
                    {
                        timeOut: 5000,
                        closeButton: true,
                        closeEasing: 'swing',
                        progressBar: true
                    });
    }
}

function setCookie (name, value) 
{
    var date = new Date(),
    expires = 'expires=';
    //date.setTime(date.getTime() + 31536000000);
    date.setDate(date.getDate() + 1);
            
    expires += date.toGMTString();
    document.cookie = name + '=' + value + '; ' + expires + '; path=/';
}
function copyFunction() {
  var copyText = document.getElementById("copy-link");
  navigator.clipboard.writeText(copyText.value);
  jQuery('.ilab-copy-text').text('Copied');
  setTimeout(function() {
    jQuery('.ilab-copy-text').text('Copy Link');
  }, 2000);
}      
function getCookie (name) 
{
    var allCookies = document.cookie.split(';'),
        cookieCounter = 0,
        currentCookie = '';
    for (cookieCounter = 0; cookieCounter < allCookies.length; cookieCounter++) {
                currentCookie = allCookies[cookieCounter];
                while (currentCookie.charAt(0) === ' ') {
                    currentCookie = currentCookie.substring(1, currentCookie.length);
                }
                if (currentCookie.indexOf(name + '=') === 0) {
                    return currentCookie.substring(name.length + 1, currentCookie.length);
                }
    }
    return false;
}


