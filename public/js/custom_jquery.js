$(document).ready(function(){
    $('#file').change(displayimg);
});

function displayimg(e){
    $('#update_image').attr('src',URL.createObjectURL(e.target.files[0]));
}