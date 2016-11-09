<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script src="<?php echo base_url();?>js/animated.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/easing.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/custom.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>js/retina.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $('section[data-type="parallax_section"]').each(function(){
        var $bgobj = $(this); // Variable para asignacion de objeto
        $(window).scroll(function() {
        	$window = $(window);
            var yPos = -($window.scrollTop() / $bgobj.data('speed'));
            // cordinadas del background
            var coords = '50% '+ yPos + 'px';
            // moviendo el background
            $bgobj.css({ backgroundPosition: coords });
        });
    });
});
</script>
	
