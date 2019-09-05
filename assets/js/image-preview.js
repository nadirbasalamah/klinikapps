function previewImage(idImagePrev,idImageSrc) {
    document.getElementById(idImagePrev).style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById(idImageSrc).files[0]);

    oFReader.onload = function(oFREvent) {
    document.getElementById(idImagePrev).src = oFREvent.target.result;
  };
}