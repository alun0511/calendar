const numberOfParticipantSelection = document.querySelector(
    ".numberOfParticipants-selection"
);
const participantsContainer = document.querySelector(".participants-container");

const users = [];

fetch("/api/users")
    .then((response) => response.json())
    .then((data) => {
        users.push(data);
    });

let altered = false;
const createSelections = () => {
    for (let i = 0; i < numberOfParticipantSelection.value; i++) {
        const select = document.createElement("select");
        select.name = "participants[]";
        select.classList.add("participant-select");
        users[0].forEach((user) => {
            const option = document.createElement("option");
            option.value = user.email;
            option.innerHTML = user.name;
            select.append(option);
        });
        participantsContainer.append(select);
    }
};

numberOfParticipantSelection.addEventListener("change", () => {
    if (altered) {
        const selections = document.querySelectorAll(".participant-select");
        for (let i = 0; i < selections.length; i++) {
            selections[i].remove();
        }
        createSelections();
    } else {
        createSelections();
        altered = true;
    }
});
