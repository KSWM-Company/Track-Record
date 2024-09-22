function handleImageUpload(files, divDisplay) {
    const imagePreviewContainer = $(divDisplay);
    for (const file of files) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = $('<img>').attr('src', e.target.result);
            const removeButton = $('<button>').text('x').addClass('remove-image');
            const previewDiv = $('<div>').addClass('image-preview').append(img).append(removeButton);
            imagePreviewContainer.append(previewDiv);
            removeButton.click(function() {
                previewDiv.remove();
            });
            //  Pop-up functionality
            img.click(function() {
                showImagePopUp(e.target.result);
            });
        };
        reader.readAsDataURL(file);
    }
}

 // Function to display existing images from the database
 function displayExistingImages(images) {
    const imagePreviewContainer = $('.imgGallery');
    imagePreviewContainer.empty(); // Clear any previous images
    images.forEach((imageURL) => {
        const img = $('<img>').attr('src', imageURL.file_base64).addClass('existing-image');
        const removeButton = $('<button>').text('x').addClass('remove-image');
        const previewDiv = $('<div>').addClass('image-preview').append(img).append(removeButton);
        imagePreviewContainer.append(previewDiv);
        // Remove image functionality
        removeButton.click(function () {
            previewDiv.remove();
        });
         // Pop-up functionality
        img.click(function() {
            showImagePopUp(imageURL.file_base64);
        });
    });
}

function showImagePopUp(imageSrc) {
    // Create the modal structure
    const modal = $('<div>').addClass('image-modal');
    const modalContent = $('<div>').addClass('modal-content');
    const modalImage = $('<img>').attr('src', imageSrc).addClass('modal-image');
    const closeButton = $('<button>').text('Close').addClass('close-modal');

    // Append elements
    modalContent.append(modalImage).append(closeButton);
    modal.append(modalContent);
    $('body').append(modal);

    // Show the modal
    modal.fadeIn();

    // Close modal event
    closeButton.click(function() {
        modal.fadeOut(function() {
            modal.remove();
        });
    });

    // Close modal on click outside
    modal.click(function(event) {
        if ($(event.target).is('.image-modal')) {
            modal.fadeOut(function() {
                modal.remove();
            });
        }
    });
}
