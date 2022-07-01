$("form#generateQrForm").on("submit",function (e) {
    e.preventDefault();
   var qrText = $("#output.php?&kode_pendaftaran=<?= $id; ?>").val();
   $.post("../../pendaftaran/confirmaksi.php",{generateQr:'kode_pendaftaran',qrText:qrText},function (response) {
        var data = response.split('^');
        var generateQrImgPath = data[1];
        $("#generatedQrImg").attr("src",generateQrImgPath);
   })
});