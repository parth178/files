<!-- repeter field  -->

<?php
if( have_rows('repeater_field_name') ):
    while ( have_rows('repeater_field_name') ) : the_row(); ?>
       <?php the_sub_field('sub_field_name'); ?>
<?php endwhile; endif; ?>


<!-- Link array -->
<?php 
$link = get_field('link');
if( $link ): ?>
    <a class="button" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
<?php endif; ?>

 <!-- reletionship field  -->

<?php
$posts = get_field('relationship_field_name');
if( $posts ): ?>
    <ul>
    <?php foreach( $posts as $post): ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span>Custom field from $post: <?php the_field('author'); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<!-- page excerpt -->
<?php
function add_excerpt_to_pages() 
{
     add_post_type_support( 'page', 'excerpt' );
}
add_action('init', 'add_excerpt_to_pages'); ?>


<!-- pagination -->

<?php if ( have_posts() ) : ?>

<!-- Add the pagination functions here. -->

<!-- Start of the main loop. -->
<?php while ( have_posts() ) : the_post();  ?>

<!-- the rest of your theme's main loop -->

<?php endwhile; ?>
<!-- End of the main loop -->

<!-- Add the pagination functions here. -->

<div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>

<?php else : ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<!-- Contact from shortcode -->

<?php $cf_id = get_field( 'form_shortcode'); ?>
<?php echo do_shortcode($cf_id); ?>

<!-- for active class on menu -->
<?php
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
?>

<!-- sidebar widget -->
<?php
function ptr_widgets_init() {

 register_sidebar( array(
 'name' => 'Footer Sidebar 1',
 'id' => 'footer-sidebar-1',
 'description' => 'Appears in the footer area',
 'before_widget' => '<aside id="%1$s" class="widget %2$s">',
 'after_widget' => '</aside>',
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>',
 ) );

 add_action('widgets_init', 'ptr_widgets_init');
 ?>


 <!-- get page url dynamically -->
 <?php echo get_site_url().'/page-name'; ?>



 <!-- page speed optimization code(put on .htaccess) -->
 <IfModule mod_expires.c>
ExpiresActive On
ExpiresByType image/jpg "access 1 month"
ExpiresByType image/jpeg "access 1 month"
ExpiresByType image/gif "access 1 month"
ExpiresByType image/png "access 1 month"
ExpiresByType image/svg "access 1 month"
ExpiresByType text/css "access 1 month"
ExpiresByType text/html "access 1 month"
ExpiresByType application/pdf "access 1 month"
ExpiresByType text/x-javascript "access 1 month"
ExpiresByType text/javascript "access 1 month"
ExpiresByType application/javascript "access 1 month"
ExpiresByType application/xhtml+xml "access 1 month"
ExpiresByType application/x-shockwave-flash "access 1 month"
ExpiresByType image/x-icon "access 1 month"
ExpiresDefault "access 1 month"
</IfModule>

<ifModule mod_headers.c>
  <filesMatch ".(css|jpg|jpeg|png|gif|swf|svg|js|ico)$">
    Header set Cache-Control "max-age=2592000, public"
  </filesMatch>
  <filesMatch ".(x?html?|php)$">
    Header set Cache-Control "private, must-revalidate"
  </filesMatch>
</ifModule>

<IfModule mod_deflate.c>
  # Compress HTML, CSS, JavaScript, Text, XML and fonts
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE font/opentype
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/xml

  # Remove browser bugs (only needed for really old browsers)
  BrowserMatch ^Mozilla/4 gzip-only-text/html
  BrowserMatch ^Mozilla/4\.0[678] no-gzip
  BrowserMatch \bMSIE !no-gzip !gzip-only-text/html
  Header append Vary User-Agent
</IfModule>
# BEGIN W3TC Browser Cache
<IfModule mod_mime.c>
    AddType text/css .css
    AddType text/x-component .htc
    AddType application/x-javascript .js
    AddType application/javascript .js2
    AddType text/javascript .js3
    AddType text/x-js .js4
    AddType video/asf .asf .asx .wax .wmv .wmx
    AddType video/avi .avi
    AddType image/bmp .bmp
    AddType application/java .class
    AddType video/divx .divx
    AddType application/msword .doc .docx
    AddType application/vnd.ms-fontobject .eot
    AddType application/x-msdownload .exe
    AddType image/gif .gif
    AddType application/x-gzip .gz .gzip
    AddType image/x-icon .ico
    AddType image/jpeg .jpg .jpeg .jpe
    AddType image/webp .webp
    AddType application/json .json
    AddType application/vnd.ms-access .mdb
    AddType audio/midi .mid .midi
    AddType video/quicktime .mov .qt
    AddType audio/mpeg .mp3 .m4a
    AddType video/mp4 .mp4 .m4v
    AddType video/mpeg .mpeg .mpg .mpe
    AddType application/vnd.ms-project .mpp
    AddType application/x-font-otf .otf
    AddType application/vnd.ms-opentype ._otf
    AddType application/vnd.oasis.opendocument.database .odb
    AddType application/vnd.oasis.opendocument.chart .odc
    AddType application/vnd.oasis.opendocument.formula .odf
    AddType application/vnd.oasis.opendocument.graphics .odg
    AddType application/vnd.oasis.opendocument.presentation .odp
    AddType application/vnd.oasis.opendocument.spreadsheet .ods
    AddType application/vnd.oasis.opendocument.text .odt
    AddType audio/ogg .ogg
    AddType application/pdf .pdf
    AddType image/png .png
    AddType application/vnd.ms-powerpoint .pot .pps .ppt .pptx
    AddType audio/x-realaudio .ra .ram
    AddType image/svg+xml .svg .svgz
    AddType application/x-shockwave-flash .swf
    AddType application/x-tar .tar
    AddType image/tiff .tif .tiff
    AddType application/x-font-ttf .ttf .ttc
    AddType application/vnd.ms-opentype ._ttf
    AddType audio/wav .wav
    AddType audio/wma .wma
    AddType application/vnd.ms-write .wri
    AddType application/font-woff .woff
    AddType application/font-woff2 .woff2
    AddType application/vnd.ms-excel .xla .xls .xlsx .xlt .xlw
    AddType application/zip .zip
</IfModule>
<IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType text/css A31536000
    ExpiresByType text/x-component A31536000
    ExpiresByType application/x-javascript A31536000
    ExpiresByType application/javascript A31536000
    ExpiresByType text/javascript A31536000
    ExpiresByType text/x-js A31536000
    ExpiresByType video/asf A31536000
    ExpiresByType video/avi A31536000
    ExpiresByType image/bmp A31536000
    ExpiresByType application/java A31536000
    ExpiresByType video/divx A31536000
    ExpiresByType application/msword A31536000
    ExpiresByType application/vnd.ms-fontobject A31536000
    ExpiresByType application/x-msdownload A31536000
    ExpiresByType image/gif A31536000
    ExpiresByType application/x-gzip A31536000
    ExpiresByType image/x-icon A31536000
    ExpiresByType image/jpeg A31536000
    ExpiresByType image/webp A31536000
    ExpiresByType application/json A31536000
    ExpiresByType application/vnd.ms-access A31536000
    ExpiresByType audio/midi A31536000
    ExpiresByType video/quicktime A31536000
    ExpiresByType audio/mpeg A31536000
    ExpiresByType video/mp4 A31536000
    ExpiresByType video/mpeg A31536000
    ExpiresByType application/vnd.ms-project A31536000
    ExpiresByType application/x-font-otf A31536000
    ExpiresByType application/vnd.ms-opentype A31536000
    ExpiresByType application/vnd.oasis.opendocument.database A31536000
    ExpiresByType application/vnd.oasis.opendocument.chart A31536000
    ExpiresByType application/vnd.oasis.opendocument.formula A31536000
    ExpiresByType application/vnd.oasis.opendocument.graphics A31536000
    ExpiresByType application/vnd.oasis.opendocument.presentation A31536000
    ExpiresByType application/vnd.oasis.opendocument.spreadsheet A31536000
    ExpiresByType application/vnd.oasis.opendocument.text A31536000
    ExpiresByType audio/ogg A31536000
    ExpiresByType application/pdf A31536000
    ExpiresByType image/png A31536000
    ExpiresByType application/vnd.ms-powerpoint A31536000
    ExpiresByType audio/x-realaudio A31536000
    ExpiresByType image/svg+xml A31536000
    ExpiresByType application/x-shockwave-flash A31536000
    ExpiresByType application/x-tar A31536000
    ExpiresByType image/tiff A31536000
    ExpiresByType application/x-font-ttf A31536000
    ExpiresByType application/vnd.ms-opentype A31536000
    ExpiresByType audio/wav A31536000
    ExpiresByType audio/wma A31536000
    ExpiresByType application/vnd.ms-write A31536000
    ExpiresByType application/font-woff A31536000
    ExpiresByType application/font-woff2 A31536000
    ExpiresByType application/vnd.ms-excel A31536000
    ExpiresByType application/zip A31536000
</IfModule>
<IfModule mod_deflate.c>
        AddOutputFilterByType DEFLATE text/css text/x-component application/x-javascript application/javascript text/javascript text/x-js text/html text/richtext image/svg+xml text/plain text/xsd text/xsl text/xml image/bmp application/java application/msword application/vnd.ms-fontobject application/x-msdownload image/x-icon image/webp application/json application/vnd.ms-access application/vnd.ms-project application/x-font-otf application/vnd.ms-opentype application/vnd.oasis.opendocument.database application/vnd.oasis.opendocument.chart application/vnd.oasis.opendocument.formula application/vnd.oasis.opendocument.graphics application/vnd.oasis.opendocument.presentation application/vnd.oasis.opendocument.spreadsheet application/vnd.oasis.opendocument.text audio/ogg application/pdf application/vnd.ms-powerpoint image/svg+xml application/x-shockwave-flash image/tiff application/x-font-ttf application/vnd.ms-opentype audio/wav application/vnd.ms-write application/font-woff application/font-woff2 application/vnd.ms-excel
    <IfModule mod_mime.c>
        # DEFLATE by extension
        AddOutputFilter DEFLATE js css htm html xml
    </IfModule>
</IfModule>
<FilesMatch "\.(css|htc|less|js|js2|js3|js4|CSS|HTC|LESS|JS|JS2|JS3|JS4)$">
    FileETag MTime Size
    <IfModule mod_headers.c>
         Header unset Set-Cookie
    </IfModule>
</FilesMatch>
<FilesMatch "\.(html|htm|rtf|rtx|svg|txt|xsd|xsl|xml|HTML|HTM|RTF|RTX|SVG|TXT|XSD|XSL|XML)$">
    FileETag MTime Size
    <IfModule mod_headers.c>
        Header append Vary User-Agent env=!dont-vary
    </IfModule>
</FilesMatch>
<FilesMatch "\.(asf|asx|wax|wmv|wmx|avi|bmp|class|divx|doc|docx|eot|exe|gif|gz|gzip|ico|jpg|jpeg|jpe|webp|json|mdb|mid|midi|mov|qt|mp3|m4a|mp4|m4v|mpeg|mpg|mpe|mpp|otf|_otf|odb|odc|odf|odg|odp|ods|odt|ogg|pdf|png|pot|pps|ppt|pptx|ra|ram|svg|svgz|swf|tar|tif|tiff|ttf|ttc|_ttf|wav|wma|wri|woff|woff2|xla|xls|xlsx|xlt|xlw|zip|ASF|ASX|WAX|WMV|WMX|AVI|BMP|CLASS|DIVX|DOC|DOCX|EOT|EXE|GIF|GZ|GZIP|ICO|JPG|JPEG|JPE|WEBP|JSON|MDB|MID|MIDI|MOV|QT|MP3|M4A|MP4|M4V|MPEG|MPG|MPE|MPP|OTF|_OTF|ODB|ODC|ODF|ODG|ODP|ODS|ODT|OGG|PDF|PNG|POT|PPS|PPT|PPTX|RA|RAM|SVG|SVGZ|SWF|TAR|TIF|TIFF|TTF|TTC|_TTF|WAV|WMA|WRI|WOFF|WOFF2|XLA|XLS|XLSX|XLT|XLW|ZIP)$">
    FileETag MTime Size
    <IfModule mod_headers.c>
         Header unset Set-Cookie
    </IfModule>
</FilesMatch>
<FilesMatch "\.(bmp|class|doc|docx|eot|exe|ico|webp|json|mdb|mpp|otf|_otf|odb|odc|odf|odg|odp|ods|odt|ogg|pdf|pot|pps|ppt|pptx|svg|svgz|swf|tif|tiff|ttf|ttc|_ttf|wav|wri|woff|woff2|xla|xls|xlsx|xlt|xlw|BMP|CLASS|DOC|DOCX|EOT|EXE|ICO|WEBP|JSON|MDB|MPP|OTF|_OTF|ODB|ODC|ODF|ODG|ODP|ODS|ODT|OGG|PDF|POT|PPS|PPT|PPTX|SVG|SVGZ|SWF|TIF|TIFF|TTF|TTC|_TTF|WAV|WRI|WOFF|WOFF2|XLA|XLS|XLSX|XLT|XLW)$">
    <IfModule mod_headers.c>
         Header unset Last-Modified
    </IfModule>
</FilesMatch>
# END W3TC Browser Cache
# BEGIN GZIP COMPRESSION
<IfModule mod_gzip.c>
mod_gzip_on Yes
mod_gzip_dechunk Yes
mod_gzip_item_include file \.(html?|txt|css|js|php|pl)$
mod_gzip_item_include handler ^cgi-script$
mod_gzip_item_include mime ^text/.*
mod_gzip_item_include mime ^application/x-javascript.*
mod_gzip_item_exclude mime ^image/.*
mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</IfModule>
# END GZIP COMPRESSION