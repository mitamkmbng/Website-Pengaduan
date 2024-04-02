var buktiContainer = document.getElementById('buktiContainer');
var tambahBuktiBtn = document.getElementById('tambahBuktiBtn');

// Fungsi untuk mengatur visibilitas tombol "Hapus"
function aturVisibilitasTombolHapus() {
    var formulir = buktiContainer.getElementsByClassName('form-group');
    if (formulir.length === 1) {
        formulir[0].querySelector('.hapusBuktiBtn').style.display = 'none';
    } else {
        for (var i = 0; i < formulir.length; i++) {
            formulir[i].querySelector('.hapusBuktiBtn').style.display = 'block';
        }
    }
}

// Fungsi untuk menambahkan formulir baru
function tambahFormulir() {
    var formGroup = document.createElement('div');
    formGroup.className = 'form-group';
    
    var inputFile = document.createElement('input');
    inputFile.type = 'file';
    inputFile.name = 'file[]';
    inputFile.accept = '.doc,.pdf,.docx,.jpeg,.jpg,.mp4,.mp3';
    inputFile.required = true;
    
    var hapusButton = document.createElement('button');
    hapusButton.type = 'button';
    hapusButton.className = 'hapusBuktiBtn';
    hapusButton.textContent = 'Hapus';
    
    formGroup.appendChild(inputFile);
    formGroup.appendChild(hapusButton);
    
    buktiContainer.appendChild(formGroup);
    
    // Perbarui visibilitas tombol "Hapus"
    aturVisibilitasTombolHapus();
}

// Tambahkan event listener untuk tombol "Tambah Bukti"
tambahBuktiBtn.addEventListener('click', tambahFormulir);

// Event delegation untuk menghapus formulir
buktiContainer.addEventListener('click', function(event) {
    if (event.target && event.target.classList.contains('hapusBuktiBtn')) {
        event.target.parentNode.remove();
        // Perbarui visibilitas tombol "Hapus"
        aturVisibilitasTombolHapus();
    }
});

// Inisialisasi visibilitas tombol "Hapus"
aturVisibilitasTombolHapus();