document.addEventListener("DOMContentLoaded", function () {
    document.addEventListener('click', function (e) {
        console.log(e.target.dataset.id);

        
        
        if (e.target.id === 'hapus') {
            
            document.getElementById('number').innerHTML = e.target.dataset.id;
            const myModal = new bootstrap.Modal('#ModalHapus');
            myModal.show();
        } else if (e.target.id==='hapusModal') {
            console.log('jalan')
            const id = document.getElementById("number").innerHTML;
            window.location.href = `hapus.php?id=${id}`;

        }
    });

});
    