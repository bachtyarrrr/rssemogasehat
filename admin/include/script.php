    <script src="../assets/node_modules/jquery/jquery.min.js"></script>
    <script src="../assets/node_modules/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/js/waves.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/custom.min.js"></script>
    <script src="../assets/node_modules/raphael/raphael-min.js"></script>
    <script src="../assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="../assets/node_modules/d3/d3.min.js"></script>
    <script src="../assets/node_modules/c3-master/c3.min.js"></script>
    <script src="../assets/js/dashboard1.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script>var dropdown = document.getElementsByClassName("dropdown");
        var i;

        for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
        } else {
        dropdownContent.style.display = "block";
        }
        });
        }

        function InputWord(evt) {
            var key = String.fromCharCode(evt.which);
            if (!(/^[a-zA-Z ]+$/.test(key))) {
                evt.preventDefault();
            }
        }
    </script>