<footer class="banner-footer">
    <p>© 2026 Yashraj Shopping Zone</p>
</footer>

<!-- PRELOADER SCRIPT -->
<script>

    window.addEventListener("load", function () {

        setTimeout(function () {

            document.getElementById("preloader").style.display = "none";

        }, 3000);   // 3000ms = 3 seconds

    });

</script>


<!-- BANNER AUTO SLIDER -->

<script>

    let index = 0;

    const slider = document.querySelector(".banner-slider");
    const slides = document.querySelectorAll(".banner-slider img");

    function autoSlide() {

        index++;

        slider.style.transition = "transform 1s ease";
        slider.style.transform = "translateX(-" + (index * 100) + "%)";

        if (index === slides.length - 1) {

            setTimeout(() => {
                slider.style.transition = "none";
                slider.style.transform = "translateX(0)";
                index = 0;
            }, 1000);

        }

    }

    setInterval(autoSlide, 3000);

</script>
<script>

    function addToCart(id) {
        fetch("cart.php?id=" + id)
            .then(response => response.text())
            .then(data => {

                document.getElementById("cartPopup").style.display = "flex";

            });
    }

    function closePopup() {
        document.getElementById("cartPopup").style.display = "none";
    }

</script>

</body>

</html>