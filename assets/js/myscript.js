// Swal.fire({
// 	title: "Tes SweetAlert2",
// 	text: "Tes SweetAlert2",
// 	type: "success",
// 	icon: "success",
// });
var baseUrl = "http://localhost/ci3ukk/";

const flashDataKategori = $(".flash-data-kategori").data("flashDataKategori");

const flashDataBarang = $(".flash-data-barang").data("flashDataBarang");

// console.log(flashDataKategori);
// Swal.fire("Tes", "Tes " + flashDataKategori, "success");

if (flashDataKategori == "Ditambahkan") {
	Swal.fire({
		title: "Data " + flashDataKategori,
		text: "Data telah berhasil " + flashDataKategori,
		type: "success",
		icon: "success",
	});
}

if (flashDataKategori == "Diubah") {
	Swal.fire({
		title: "Data " + flashDataKategori,
		text: "Data telah berhasil " + flashDataKategori,
		type: "success",
		icon: "success",
	});
}

if (flashDataKategori == "Dihapus") {
	Swal.fire({
		title: "Data " + flashDataKategori,
		text: "Data telah berhasil " + flashDataKategori,
		type: "success",
		icon: "success",
	});
}

$(".tombol-hapus").on("click", function (e) {
	e.preventDefault();
	const href = $(this).attr("href");
	console.log(href);

	Swal.fire({
		title: "Apakah Anda yakin?",
		text: "Data Kategori akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data",
	}).then((result) => {
		if (result.isConfirmed) {
			document.location.href = href;
		}
	});
});
