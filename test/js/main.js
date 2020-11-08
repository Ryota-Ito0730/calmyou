let a_min = -20;
let a_pls = 20;
let common = 0;
let i = 1;
let y = 1;
let up_value = 0;
let down_value = 0;
let current_value = 0;
let ini_value = -100;
current_value = ini_value;
$(function () {
  // ▲クリック時の処理(PC版)
  $("#up").on("click", function () {
    if (current_value < -140) {
      return false;
    } else {
      if (i == 1) {
        if (y == 1) {
          common = -100;
        }
        current_value = common + a_min * i;
        common = current_value;
      } else {
        current_value = common;
        common = (current_value + a_min * i) - (a_min * (i - 1));
      }// if締め
      $("ul").css({
        "transform": `translateY(${common}px)`
      });
    }
    i++;
    y = 1;
  });
  $("#down").on("click", function () {
    // ▼クリック時の処理(PC版)
    if (current_value > -40) {
      return false;
    } else {
      if (y == 1) {
        if (i == 1) {
          common = -100;
        }
        current_value = common + a_pls * y;
        common = current_value;
      } else {
        current_value = common;
        common = (current_value + a_pls * y) - (a_pls * (y - 1));
      }// if締め
      $("ul").css({
        "transform": `translateY(${common}px)`
      });
    }
    y++;
    i = 1;
  });
});/////////////////////