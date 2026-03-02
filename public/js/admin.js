document.querySelectorAll(".delete").forEach(btn=>{
btn.addEventListener("click",function(e){

if(!confirm("Yakin ingin menghapus project ini?")){
e.preventDefault();
}

});
});