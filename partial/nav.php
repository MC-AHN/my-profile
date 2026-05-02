<nav>
    <div class="container">
        <a href="#hero">HOME</a>
        <a href="#portofolio">PORTOFOLIO</a>
        <a href="#resume">RESUME</a>
        <a href="#aboutme">ABOUT</a>
        <a href="#contact">CONTACT</a>
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