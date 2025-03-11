const sliderBtn = document.getElementById('sliderBtn');
const newsBtn = document.getElementById('newsBtn');
const marqueeBtn = document.getElementById('marqueeBtn');
const formSection = document.getElementById('formSection');

// Event listeners to show the corresponding forms
sliderBtn.addEventListener('click', () => showForm('slider'));
newsBtn.addEventListener('click', () => showForm('news'));
marqueeBtn.addEventListener('click', () => showForm('marquee'));

function showForm(type) {
  // Hide all forms first
  document.getElementById('sliderForm').style.display = 'none';
  document.getElementById('newsForm').style.display = 'none';
  document.getElementById('marqueeForm').style.display = 'none';

  // Show the relevant form
  switch (type) {
    case 'slider':
      document.getElementById('sliderForm').style.display = 'block';
      break;
    case 'news':
      document.getElementById('newsForm').style.display = 'block';
      break;
    case 'marquee':
      document.getElementById('marqueeForm').style.display = 'block';
      break;
  }
}

// Function to Save Content Based on Type
function saveContent(type) {
  switch (type) {
    case 'slider':
      const sliderTitle = document.getElementById('sliderTitle').value;
      const sliderImage = document.getElementById('sliderImage').files[0];

      if (sliderTitle && sliderImage) {
        alert('Slider saved successfully!');
        // Add logic to display the image in the slider container
      } else {
        alert('Please fill all fields.');
      }
      break;

    case 'news':
      const newsTitle = document.getElementById('newsTitle').value;
      const newsDescription = document.getElementById('newsDescription').value;

      if (newsTitle && newsDescription) {
        alert('News saved successfully!');
        // Add logic to display the news in the news container
      } else {
        alert('Please fill all fields.');
      }
      break;

    case 'marquee':
      const marqueeText = document.getElementById('marqueeText').value;

      if (marqueeText) {
        alert('Marquee text saved successfully!');
        // Add logic to display the marquee text
      } else {
        alert('Please enter marquee text.');
      }
      break;
  }
}

// Function to Preview Selected Image
function previewImage() {
  const image = document.getElementById('sliderImage').files[0];

  if (image) {
    const reader = new FileReader();
    reader.onload = function (e) {
      alert('Preview: ' + e.target.result);
    };
    reader.readAsDataURL(image);
  } else {
    alert('No image selected.');
  }
}
