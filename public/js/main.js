
document.addEventListener("click", function(event) {
    // Hide the spam dialog if it's visible
    const toggleSpamDialogBtn = event.target.closest(".toggle-spam");

    if (toggleSpamDialogBtn == null) {
        //  this click is not inside the spam dialog so check the dialog state of visibility
        const spamDialogs = document.getElementsByClassName("spam-dialog");
        for (let i = 0; i < spamDialogs.length; i++) {
            const hasHiddenClass = spamDialogs[i].classList.contains("hidden");
            if (!hasHiddenClass) { // if any dialog is visible then hide it
                spamDialogs[i].classList.add("hidden");
            }
        }
    } else {
        // keep the spam dialog open if it's visible
    }
});

// Function to toggle the spam dialog when click event occurred
function toggleSpamDialog(event) {
    event.querySelector('.spam-dialog').classList.toggle("hidden");
}

function clickableIdeaContainer(event) {
    // when the whole idea container is clicked then navigate to the relevant idea show page
    const ignores = ['button','svg','path','a', 'img'];
    const ideaLink = event.closest('.idea-container').querySelector('.idea-link');
    ideaLink.click();
}

