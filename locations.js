$(document).ready(function () {
    // Initialize Select2 for country, state, and city dropdowns
    $(".searchable-dropdown").select2({
        placeholder: "Search and select...",
        width: "100%",
        allowClear: true, // Allows clearing the selection
        tags: true, // Allows user to type their own values and match them with the options
        matcher: function(params, data) {
            // Custom search matching for performance improvement
            if ($.trim(params.term) === '') {
                return data; // If there's no search term, display all items
            }

            if (data.text.toLowerCase().includes(params.term.toLowerCase())) {
                return data; // If match found, return the item
            }
            return null; // Otherwise, do not display this item
        }
    });

    const countryDropdown = $("#country");
    const stateDropdown = $("#state");
    const cityDropdown = $("#city");

    const countryTextInput = $("#country-text");
    const stateTextInput = $("#state-text");
    const cityTextInput = $("#city-text");

    // Toggle between select and text input
    function toggleSelectInput(dropdown, textInput) {
        if (dropdown.val() === "" && textInput.val() === "") {
            dropdown.show();
            textInput.hide();
        } else {
            dropdown.hide();
            textInput.show();
        }
    }

    // Country Field Change Logic
    countryDropdown.on("change", function () {
        toggleSelectInput(countryDropdown, countryTextInput);
        const countryId = $(this).val();
        clearDropdown(stateDropdown, "Select State/Province...");
        clearDropdown(cityDropdown, "Select City...");
        loadStates(countryId);
    });

    countryTextInput.on("input", function () {
        toggleSelectInput(countryDropdown, countryTextInput);
    });

    // State Field Change Logic
    stateDropdown.on("change", function () {
        toggleSelectInput(stateDropdown, stateTextInput);
        const stateId = $(this).val();
        clearDropdown(cityDropdown, "Select City...");
        loadCities(stateId);
    });

    stateTextInput.on("input", function () {
        toggleSelectInput(stateDropdown, stateTextInput);
    });

    // City Field Change Logic
    cityDropdown.on("change", function () {
        toggleSelectInput(cityDropdown, cityTextInput);
    });

    cityTextInput.on("input", function () {
        toggleSelectInput(cityDropdown, cityTextInput);
    });

    // Function to show a loading indicator
    function showLoading(selector) {
        $(selector).empty().append('<option value="">Loading...</option>').attr("disabled", true);
    }

    // Function to clear dropdown options
    function clearDropdown(selector, placeholder) {
        $(selector).empty().append(`<option value="">${placeholder}</option>`).attr("disabled", true);
    }

    // Load countries
    function loadCountries() {
        $.ajax({
            url: "get_locations.php",
            type: "GET",
            data: { type: "countries" },
            dataType: "json",
            success: function (countries) {
                clearDropdown(countryDropdown, "Select Country...");
                countries.forEach((country) => {
                    countryDropdown.append(
                        `<option value="${country.id}">${country.name}</option>`
                    );
                });
                countryDropdown.attr("disabled", false).trigger("change");
            },
            error: function () {
                alert("Failed to load countries. Please try again.");
            }
        });
    }

    // Load states based on country selection
    function loadStates(countryId) {
        if (countryId) {
            showLoading(stateDropdown);
            $.ajax({
                url: "get_locations.php",
                type: "GET",
                data: { type: "states", parent_id: countryId },
                dataType: "json",
                success: function (states) {
                    clearDropdown(stateDropdown, "Select State/Province...");
                    if (states.length > 0) {
                        // If there are states, show state dropdown and load cities
                        states.forEach((state) => {
                            stateDropdown.append(
                                `<option value="${state.id}">${state.name}</option>`
                            );
                        });
                        stateDropdown.attr("disabled", false).trigger("change");
                        cityDropdown.attr("disabled", true);
                        clearDropdown(cityDropdown, "Select City...");
                    } else {
                        // If no states, disable state dropdown and allow city selection
                        stateDropdown.attr("disabled", true);
                        clearDropdown(stateDropdown, "No States Available");

                        // Load cities directly for countries with no states
                        loadCities(countryId);
                    }
                },
                error: function () {
                    alert("Failed to load states. Please try again.");
                }
            });
        }
    }

    // Load cities based on state selection or directly based on country selection
    function loadCities(countryId, stateId = null) {
        let url = stateId 
            ? `get_locations.php?type=cities&parent_id=${stateId}` 
            : `get_locations.php?type=cities&parent_id=${countryId}`; // Load cities based on state or country
        
        if (countryId) {
            showLoading(cityDropdown);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (cities) {
                    clearDropdown(cityDropdown, "Select City...");
                    if (cities.length > 0) {
                        cities.forEach((city) => {
                            cityDropdown.append(
                                `<option value="${city.id}">${city.name}</option>`
                            );
                        });
                        cityDropdown.attr("disabled", false);
                    } else {
                        cityDropdown.attr("disabled", true);
                        clearDropdown(cityDropdown, "No Cities Available");
                    }
                },
                error: function () {
                    alert("Failed to load cities. Please try again.");
                }
            });
        }
    }

    // Handle country selection change
    countryDropdown.on("change", function () {
        const countryId = $(this).val();
        clearDropdown(stateDropdown, "Select State/Province...");
        clearDropdown(cityDropdown, "Select City...");
        loadStates(countryId); // Load states or cities based on country selection
    });

    // Handle state selection change
    stateDropdown.on("change", function () {
        const stateId = $(this).val();
        clearDropdown(cityDropdown, "Select City...");
        loadCities(stateId); // Load cities based on state selection
    });

    loadCountries(); // Load countries on page load
});
