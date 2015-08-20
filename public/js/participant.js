/*********** participant.js ***********/

/* Populate the action button */
$(document).ready(function() {
  $("#btn-all-participant").click(function() {
    checkAll();
  });

  $("#btn-none-participant").click(function() {
    uncheckAll();
  });

  $("#btn-participant").click(function() {
    var value = $("#select-participant option:selected").val();
    checkByVal(value);
  });

  $(".btn-checkbox > button").click(function() {
    uncheck($(this).children(':checkbox'));
    renderParticipant();
  });
});

/* Check checkbox by given value */
function checkByVal(value) {
  var selector = ".btn-checkbox > button";
  selector += "[value=" + value + "] :checkbox";

  check($(selector));
  renderParticipant();
}

/* Uncheck all checkboxes */
function uncheckAll() {
  $(".btn-checkbox :checkbox").each(function() {
    uncheck($(this));
  });
  renderParticipant();
}

/* Check all checkboxes */
function checkAll() {
  $(".btn-checkbox :checkbox").each(function() {
    check($(this));
  });
  renderParticipant();
}

/* After you check or uncheck the hidden
 * checkboxes via js, you must call this */
function renderParticipant() {
  console.log('begin renderParticipant');
  var buttons = $(".btn-checkbox > button");
  buttons
  .children(":checkbox:not(:checked)")
  .each(function() {
    $(this).parent().addClass("hidden");
  });

  buttons
  .children(":checkbox:checked")
  .each(function() {
    $(this).parent().removeClass("hidden");
    console.log($(this).val())
  });
  console.log('finish renderParticipant');
}

/* Check a checkbox */
function check(checkbox) {
  checkbox.prop("checked", "true");
  console.log('function check:');
  console.log(checkbox.val());
}

/* Uncheck a checkbox */
function uncheck(checkbox) {
  checkbox.removeAttr("checked");
}

/* Toggle check and uncheck a checkbox */
function toggleCheckbox(checkbox) {
  var now = "" + checkbox.prop("checked") + "";
  if (now != "true") {
    check(checkbox);
  } else {
    uncheck(checkbox);
  }
}