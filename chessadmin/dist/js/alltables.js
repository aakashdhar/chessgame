
var faqtable;
var redeemTable;

$(document).ready(function() {

  redeemTable = $("#redeemTable").DataTable({
    "ajax": "showredeem.php",
    "order": []
  });

  faqtable = $("#faqtable").DataTable({
    "ajax": "showfaq.php",
    "order": []
  });

});
