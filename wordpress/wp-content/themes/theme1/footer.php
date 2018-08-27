<div class="footer-info-wrapper">
    <div class="footer-info-main">
	<?php if(!dynamic_sidebar('footer')):?>
	  <div class="footer-info">
		<h3>Віджет</h3>
   </div>
   <div class="footer-info">
		<h3>Віджет</h3>
   </div>
   <div class="footer-info">
		<h3>Віджет</h3>
   </div>
   <?php endif; ?>
	    
	</div>
</div>
<div class="footer-copy">
<p class="copy">Copyright @ <?php echo date('Y');?> Всі права захищені</p>
<p class="by-st">Дизайн <a href="https://www.graphicsfuel.com/">GraphicsFuel.com</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 За підтримки <a href="https://wordpress.org/">Wordpress</a></p>
</div>
<script>
$(document).ready( function(){
    $('#slideshowHolder').jqFancyTransitions({navigation: true, width: 594, height: 279 });
});
</script>

<?php wp_footer(); ?>
</body>
</html>