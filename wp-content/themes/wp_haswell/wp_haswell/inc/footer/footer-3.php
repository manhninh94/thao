<footer id="main-footer" class="cms-footer-layout3-wrap cms-footer-wrapper">
    <?php if (is_active_sidebar('footer3-col1') || is_active_sidebar('footer3-col2') || is_active_sidebar('footer3-col3') || is_active_sidebar('footer3-col4') || is_active_sidebar('sidebar-10') || is_active_sidebar('sidebar-9')) : ?>
    <div class="main-footer-wrap pt-80 pb-50">
        <?php if (is_active_sidebar('footer3-col1') || is_active_sidebar('footer3-col2') || is_active_sidebar('footer3-col3') || is_active_sidebar('footer3-col4')) : ?>    
            <div id="cshero-footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3"><?php dynamic_sidebar('footer3-col1'); ?></div>
                        <div class="bold col-md-3 col-sm-3"><?php dynamic_sidebar('footer3-col2'); ?></div>
                        <div class="col-md-3 col-sm-3"><?php dynamic_sidebar('footer3-col3'); ?></div>
                        <div class="col-md-3 col-sm-3"><?php dynamic_sidebar('footer3-col4'); ?></div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if (is_active_sidebar('sidebar-10') || is_active_sidebar('sidebar-9')) : ?>
        <div id="cshero-footer-bottom">
            <div class="container">
                <hr class="m-0">
                <div class="row">
                    <div class="cshero-footer-wrap">
                        <div class="col-md-6 col-sm-12 pull-right"><?php dynamic_sidebar('sidebar-10'); ?></div>
                        <div class="col-md-3 col-sm-12 pull-left"><?php dynamic_sidebar('sidebar-9'); ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</footer>