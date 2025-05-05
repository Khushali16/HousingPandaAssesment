<nav>
    <ul>
        <!-- add logo https://www.housingpanda.com/images/logo/a1d84a68705ea31cc9215ec33a22a18d.png -->
        <li><img src="<?php echo base_url('img/logo.png'); ?>" alt="Logo" class="logo"></li>
        <li><a href="<?php echo base_url('/'); ?>">Insert Listing</a></li>
        <li><a href="<?php echo base_url('/listingsUser'); ?>">View User Listings</a></li>
        <li><a href="<?php echo base_url('/listingsAdmin'); ?>">View Admin Listings</a></li>
        <script>
            // add active class to the current page link
            const currentUrl = window.location.href;
            const links = document.querySelectorAll('nav ul li a');
            links.forEach(link => {
                if (link.href === currentUrl) {
                    link.classList.add('active');
                }
            });
        </script>
    </ul>
</nav>