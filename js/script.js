function myfunction(){
  document.getElementById("dpbtn").classList.toggle("show");
}


/**Fungsi untuk menampilkan form data barang */
function cliked(){
  var modal = document.getElementById('mymodal');
  modal.style.display="block";
}
function closed(){
  var modal = document.getElementById('mymodal');
  modal.style.display = "none";
}
window.onclick = function(event) {
  var modal = document.getElementById('mymodal');
  if (event.target == modal) {
    modal.style.display = "none";
  }
}


/**HALAMAN KONYTAIER */
let preveiwContainer = document.querySelector('.products-preview');
let previewBox = preveiwContainer.querySelectorAll('.preview');

document.querySelectorAll('.products-container .product').forEach(product =>{
  product.onclick = () =>{
    preveiwContainer.style.display = 'flex';
    let name = product.getAttribute('data-name');
    previewBox.forEach(preview =>{
      let target = preview.getAttribute('data-target');
      if(name == target){
        preview.classList.add('active');
      }
    });
  };
});

previewBox.forEach(close =>{
  close.querySelector('.fa-times').onclick = () =>{
    close.classList.remove('active');
    preveiwContainer.style.display = 'none';
  };
});