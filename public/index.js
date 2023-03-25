const pay_input = document.getElementById('pay_input');
let pay_value = parseInt(pay_input.value, 10);
pay_input.value = pay_value.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1 ");

const paint_col = document.querySelector('#paint_col');
paint_col.addEventListener('change', function() {
    document.querySelectorAll('.doors').forEach(function(door) {

      switch(paint_col.value) {

        case 'paint_red' : door.style.borderColor = 'red';   break;
        case 'paint_blue' : door.style.borderColor = 'blue';   break;
        case 'paint_green' : door.style.borderColor = 'green';   break;
        case 'paint_yellow' : door.style.borderColor = 'yellow';   break;

      }
    });
  })





  const film_col = document.querySelector('#film_col');
  film_col.addEventListener('change', function() {
    document.querySelectorAll('.doors').forEach(function(door) {

      switch(film_col.value) {

        case 'film_red' : door.style.backgroundColor = 'red';   break;
        case 'film_blue' : door.style.backgroundColor = 'blue';   break;
        case 'film_green' : door.style.backgroundColor = 'green';   break;
        case 'film_yellow' : door.style.backgroundColor = 'yellow';   break;

      }
    });
  })






  const handle_col = document.querySelector('#handle_col');
  handle_col.addEventListener('change', function() {
    document.querySelectorAll('.handles').forEach(function(handle) {

      switch(handle_col.value) {

        case 'handle_red' : handle.style.backgroundColor = 'red';   break;
        case 'handle_blue' : handle.style.backgroundColor = 'blue';   break;
        case 'handle_green' : handle.style.backgroundColor = 'green';   break;
        case 'handle_yellow' : handle.style.backgroundColor = 'yellow';   break;

      }
    });
  })







const input_num_width = document.querySelector('#width_l');
let previousValue = parseInt(input_num_width.value);
const door_1 = document.querySelector('.door-1');
const door_2 = document.querySelector('.door-2');
const handle_1 = document.querySelector('.handle-1');
const handle_2 = document.querySelector('.handle-2');
let initialWidth = parseInt(getComputedStyle(door_1).getPropertyValue('width'));
let initialLeft = handle_1.offsetLeft;
initialLeft -= 93;


input_num_width.addEventListener('input', function() {

    const currentValue = parseInt(input_num_width.value);

    if (currentValue > previousValue && input_num_width.stepUp) {
        initialWidth += 1;
        initialLeft += 1;
        pay_value +=  200;
        door_1.style.width = initialWidth + 'px';
        door_2.style.width = initialWidth + 'px';
        handle_1.style.left = initialLeft + 'px';
        handle_2.style.left = initialLeft + 'px';
        pay_input.value = pay_value.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1 ");
      } else if (currentValue < previousValue && input_num_width.stepDown) {
        initialWidth -= 1;
        initialLeft -= 1;
        pay_value -=  200;
        door_1.style.width = initialWidth + 'px';
        door_2.style.width = initialWidth + 'px';
        handle_1.style.left = initialLeft + 'px';
        handle_2.style.left = initialLeft + 'px';
        pay_input.value = pay_value.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1 ");
      }

      previousValue = currentValue;
  });







  const input_num_height = document.querySelector('#height_l');
let previousValue_h = parseInt(input_num_height.value);
let initialHeight = parseInt(getComputedStyle(door_1).getPropertyValue('height'));


input_num_height.addEventListener('input', function() {

    const currentValue = parseInt(input_num_height.value);

    if (currentValue > previousValue_h && input_num_height.stepUp) {
      initialHeight += 2;
      pay_value +=  200;
        door_1.style.height = initialHeight + 'px';
        door_2.style.height = initialHeight + 'px';
        pay_input.value = pay_value.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1 ");
      } else if (currentValue < previousValue_h && input_num_height.stepDown) {
        initialHeight -= 2;
        pay_value -=  200;
        door_1.style.height = initialHeight + 'px';
        door_2.style.height = initialHeight + 'px';
        pay_input.value = pay_value.toString().replace(/(\d)(?=(\d{3})+$)/g, "$1 ");
      }

      previousValue_h = currentValue;
  });







const openSelect = document.getElementById('opening_l');

openSelect.addEventListener('change', function() {

  if (this.value === 'l_side') {
    initialLeft = 2;
    handle_1.style.left = initialLeft + 'px';
    handle_2.style.left = initialLeft + 'px';
  }

  if (this.value === 'r_side') {
    initialLeft = 149;
    handle_1.style.left = initialLeft + 'px';
    handle_2.style.left = initialLeft + 'px';
  }
  

});






let doorImageForForm = document.getElementById("form-head");

// Add a submit event listener to the form element
doorImageForForm.addEventListener("submit", function(event) {

  event.preventDefault();

  html2canvas(document.getElementById("doors-div")).then(function(canvas) {
    var imgName = 'image_' + Date.now() + '.jpg'; // unique image name
    var imgData = canvas.toDataURL('image/jpeg');


    var imageNameInput = document.createElement('input');
    imageNameInput.type = 'hidden';
    imageNameInput.name = 'imageNameInput'; // The name attribute of the input field
    imageNameInput.value = imgName;


    var imageDataInput = document.createElement('input');
    imageDataInput.type = 'hidden';
    imageDataInput.name = 'imageDataInput'; // The name attribute of the input field
    imageDataInput.value = imgData;

    doorImageForForm.appendChild(imageNameInput);
    doorImageForForm.appendChild(imageDataInput);

  });


  console.log("Form submitted!");


  setTimeout(function() {
    // Your JavaScript function to be executed after the delay
    console.log("Form submitted and 5 seconds have passed!");

    // Continue with the PHP code by submitting the form programmatically
    doorImageForForm.submit();
  }, 500);

})




