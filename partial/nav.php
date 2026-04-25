<html>
    <nav>
        <div class="container">
            <a href="">HOME</a>
            <a href="">PORTOFOLIO</a>
            <a href="">RESUME</a>
            <a href="">ABOUT</a>
            <a href="">CONTACT</a>
        </div>
    </nav>

    <script>
        const navbar = document.querySelector('nav');

        window.addEventListener('scroll', function () {
            const scrollHeight = window.pageYOffset;

            if (scrollHeight > 100) {
                navbar.classList.add('scrolled')
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</html>