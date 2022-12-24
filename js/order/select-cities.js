let selectCity = document.getElementById("form-list-city");
let selectStreet = document.getElementById("form-list-street");
document.addEventListener('DOMContentLoaded', getCities);
selectCity.addEventListener("change", addStreets);


function addStreets() {
    for (//очитстити список міст перед доаванням нових
        let cityIndex = selectStreet.options.length; cityIndex > 0; cityIndex--) {
        selectStreet.remove(cityIndex);
    }
    let selectedCity = selectCity.options[selectCity.selectedIndex].text;
    let street = [];

    switch (selectedCity) {
        case "Київ":
            street = ['Андріївська', 'Хрещатик', 'Сагайдачного', 'Володимирська', 'Пейзажна']
            break;
        case "Одеса":
            street = ['Пушкінська', 'Рішельєвська', 'Ланжеронівська', 'Молдаванка']
            break;
        case "Харків":
            street = ['Сумська', 'Гоголя', 'Пушкінська', 'Дарвіна']
            break;

    }
    street.forEach((place) => {
        selectStreet.add(new Option(place, street.indexOf(place) + 1));

    });
}

function getCities() {

    const places = ['Київ', 'Одеса', "Харків"]
    places.forEach((place) => {
        selectCity.add(new Option(place, places.indexOf(place) + 1));
    });
}
