<?php
get_header();
?>

<div id="theme-page" class="master-holder  clearfix animation-load" itemscope="itemscope" itemtype="https://schema.org/Blog">
   <div class="mk-main-wrapper-holder">
      <div id="mk-page-id-" class="theme-page-wrapper mk-main-wrapper mk-grid full-layout  ">
         <div class="theme-content " itemprop="mainEntityOfPage">
            <div class="wpb_row vc_row  mk-fullwidth-false  attched-false    vc_row-fluid  js-master-row  mk-in-viewport">
               <div style="" class="vc_col-sm-12 wpb_column column_container  _ height-full">
						<?php
                     echo The_Grid('clients', false);
                  ?>
					   <div class="clearboth"></div>
               </div>
            </div>
            <div class="clearboth"></div>
         </div>
         <div class="clearboth"></div>
      </div>
   </div>
</div>

<?php
   get_footer();
?>
