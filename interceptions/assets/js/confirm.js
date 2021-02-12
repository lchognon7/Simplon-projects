"use strict";

// Function
let confirmFn = function(evt) {
  evt.preventDefault();
  let confirmMessage = evt.target.getAttribute("data-confirm");
  if (!confirmMessage) confirmMessage = "Please confirm";
  if (window.confirm(confirmMessage)) {
    location.href = evt.target.href;
  }
}

// Events
let els = document.querySelectorAll(".confirm");
if (els) {
  els.forEach(element => {
    element.addEventListener("click", confirmFn);
  });
}