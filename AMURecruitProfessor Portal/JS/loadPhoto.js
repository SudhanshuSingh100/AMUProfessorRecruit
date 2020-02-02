function loadPhoto(ImageName, id)
{
    if (ImageName.files && ImageName.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            document.getElementById(id).src = e.target.result;
        };
        reader.readAsDataURL(ImageName.files[0]);

    }
    else
    {
        document.getElementById(id).src = "Resource/DP.jpg";
    }
    //}
}


function loadAdhar(ImageName)
{
    /*var fileInput = document.getElementById('file2');
     var filePath = fileInput.value;
     var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     if(!allowedExtensions.exec(filePath)){
     alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
     fileInput.value = '';
     return false;
     
     }
     else*/
    //{

    if (ImageName.files && ImageName.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            document.getElementById("adhar").src = e.target.result;
        };
        reader.readAsDataURL(ImageName.files[0]);

    }
    else
    {
        document.getElementById("adhar").src = "Resource/DAdhar.jpg";
    }
    //}    
}

function loadPan(ImageName)
{/*
 var fileInput = document.getElementById('file3');
 var filePath = fileInput.value;
 var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 if(!allowedExtensions.exec(filePath)){
 alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
 fileInput.value = '';
 return false;
 
 }
 else*/
    //{
    if (ImageName.files && ImageName.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            document.getElementById("pan").src = e.target.result;
        };
        reader.readAsDataURL(ImageName.files[0]);

    }
    else
    {
        document.getElementById("pan").src = "Resource/DPan.jpg";
    }
    //}
}

function loadGst(ImageName)
{/*
 var fileInput = document.getElementById('file4');
 var filePath = fileInput.value;
 var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 if(!allowedExtensions.exec(filePath)){
 alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
 fileInput.value = '';
 return false;
 
 }
 else
 {*/
    if (ImageName.files && ImageName.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            document.getElementById("gst").src = e.target.result;
        };
        reader.readAsDataURL(ImageName.files[0]);

    }
    else
    {
        document.getElementById("gst").src = "Resource/Dgst.png";
    }
    //}
}

function loadCheq(ImageName)
{/*
 var fileInput = document.getElementById('file5');
 var filePath = fileInput.value;
 var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
 if(!allowedExtensions.exec(filePath)){
 alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
 fileInput.value = '';
 return false;
 
 }
 else
 {*/
    if (ImageName.files && ImageName.files[0])
    {
        var reader = new FileReader();
        reader.onload = function (e)
        {
            document.getElementById("cheq").src = e.target.result;
        };
        reader.readAsDataURL(ImageName.files[0]);

    }
    else
    {
        document.getElementById("cheq").src = "Resource/dcc.jpg";
    }
    //}
}


