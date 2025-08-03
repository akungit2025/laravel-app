import Swal from "sweetalert2";

// Notifikasi Sukses
window.toastSuccess = function (message = "Berhasil!") {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        title: message,
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
    });
};

// Notifikasi Gagal
window.toastError = function (message = "Terjadi kesalahan.") {
    Swal.fire({
        toast: true,
        position: "top-end",
        icon: "error",
        title: message,
        showConfirmButton: false,
        timer: 2500,
        timerProgressBar: true,
    });
};

// Konfirmasi Hapus
window.confirmDelete = function (callback) {
    Swal.fire({
        title: "Yakin ingin menghapus?",
        text: "Data ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed && typeof callback === "function") {
            callback();
        }
    });
};
