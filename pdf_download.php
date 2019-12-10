<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
// For the form at https://www.framefreakstudio.com/application/
if ( 2714 === event.detail.contactFormId ) {
location = 'https://www.framefreakstudio.com/thanks-app/';
}
}, false );
</script>


/////////////////////////////////////////////////////////////////////////////////////




/* add function for download PDF files  */


add_action( 'wp_footer', 'PDF_download' );

function PDF_download() {
?>

<script type="text/javascript">

document.addEventListener( 'wpcf7mailsent', function( event ) {
if ( "6139" === event.detail.contactFormId) {

download_file("http://34.230.181.212/cataliahealth-dev/wp-content/uploads/2019/09/KiddMSThesis03.pdf", 'KiddMSThesis03.pdf');
}
if ( "6139" === event.detail.contactFormId) {
  download_file("http://34.230.181.212/cataliahealth-dev/wp-content/uploads/2019/09/PharmaWhitePaper.pdf", 'PharmaWhitePaper.pdf');
}

}, true );

function download_file(fileURL, fileName) {
/* for non-IE */
if (!window.ActiveXObject) {
var save = document.createElement('a');
//console.log(save);
save.href = fileURL;
save.target = '_blank';
var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
//console.log(filename);
save.download = fileName || filename;
if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
document.location = save.href;
/* window event not working here */
}else{
var evt = new MouseEvent('click', {
'view': window,
'bubbles': true,
'cancelable': false
});
save.dispatchEvent(evt);
(window.URL || window.webkitURL).revokeObjectURL(save.href);
}
}

/* for IE < 11*/
else if ( !! window.ActiveXObject && document.execCommand) {
var _window = window.open(fileURL, '_blank');
_window.document.close();
_window.document.execCommand('SaveAs', true, fileName || fileURL)
_window.close();
}
}

</script>


<?php
}





///////////////////////////////////////////////////////////////////////////////////////////////////////


<script type='text/javascript'>document.addEventListener( 'wpcf7mailsent', function( event ) {
if ( "21" === event.detail.contactFormId) {
/window.open("https://www.primalstaging.co.uk/jeff-allison/wp-content/uploads/sites/40/2019/08/MI-PB_August2019.pdf");/
download_file("https://www.primalstaging.co.uk/jeff-allison/wp-content/uploads/sites/40/2019/08/MI-PB_August2019.pdf", 'MI-PB_August2019.pdf');
}
}, false );

function download_file(fileURL, fileName) {
/* for non-IE /
if (!window.ActiveXObject) {
var save = document.createElement('a');
save.href = fileURL;
save.target = '_blank';
var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
save.download = fileName || filename;
if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
document.location = save.href;
/ window event not working here /
}else{
var evt = new MouseEvent('click', {
'view': window,
'bubbles': true,
'cancelable': false
});
save.dispatchEvent(evt);
(window.URL || window.webkitURL).revokeObjectURL(save.href);
}
}

/ for IE < 11*/
else if ( !! window.ActiveXObject && document.execCommand) {
var _window = window.open(fileURL, '_blank');
_window.document.close();
_window.document.execCommand('SaveAs', true, fileName || fileURL)
_window.close();
}
}</script>



