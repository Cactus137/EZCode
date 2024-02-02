// Write by English
function Validator(options) {
  // Function validates
  var selectorRules = {};
  function validate(inputElement, rule) {
    var errorElement = inputElement.parentElement.querySelector(
      options.errorSelector
    );
    var errorMessage; 
    // Get rules of selector
    var rules = selectorRules[rule.selector];
    for (var i = 0; i < rules.length; i++) {
      errorMessage = rules[i](inputElement.value);
      if (errorMessage) break;
    }
    //  If there is an error message, display the error message
    if (errorMessage) {
      errorElement.innerText = errorMessage;
      inputElement.parentElement.classList.add("invalid");
    } else {
      errorElement.innerText = "";
      inputElement.parentElement.classList.remove("invalid");
    }
    return !errorMessage;
  }

  // Get form element
  var formElement = document.querySelector(options.form);
  if (formElement) {
    // When submit form
    formElement.onsubmit = function (e) {
      e.preventDefault();
      var isFormValid = true;
      // Loop through all rules and validate
      options.rules.forEach(function (rule) {
        var inputElement = formElement.querySelector(rule.selector);
        var isValid = validate(inputElement, rule);
        if (isValid) {
          isFormValid = false;
        }
      });

      if (isFormValid) {
        // Submit with JavaScript
        // if (typeof options.onSubmit === "function") {
        //   var enableInputs = formElement.querySelectorAll("[name]");
        //   var formValues = Array.from(enableInputs).reduce(function (
        //     values,
        //     input
        //   ) {
        //     switch (input.type) {
        //       case "radio":
        //         values[input.name] = formElement.querySelector(
        //           'input[name="' + input.name + '"]:checked'
        //         ).value;
        //         break;
        //       case "checkbox":
        //         if (!input.matches(":checked")) {
        //           values[input.name] = "";
        //           return values;
        //         }
        //         if (!Array.isArray(values[input.name])) {
        //           values[input.name] = [];
        //         }
        //         values[input.name].push(input.value);
        //         break;
        //       case "file":
        //         values[input.name] = input.files;
        //         break;
        //       default:
        //         values[input.name] = input.value;
        //     }
        //     return values;
        //   },
        //   {});
        //   options.onSubmit(formValues);
        } else {
          // Submit default
          formElement.submit();
      }
    };



    // Prevent default submit form
    options.rules.forEach(function (rule) {
      // Save rules
      if (Array.isArray(selectorRules[rule.selector])) {
        selectorRules[rule.selector].push(rule.test);
      } else {
        selectorRules[rule.selector] = [rule.test];
      }

      var inputElement = formElement.querySelector(rule.selector);
      if (inputElement) {
        // Event blur
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
        // Event input
        inputElement.oninput = function () {
          var errorElement =
            inputElement.parentElement.querySelector(".form-message");
          errorElement.innerText = "";
          inputElement.parentElement.classList.remove("invalid");
        };
      }
    });
  }
}

// Validator rules
Validator.isRequired = function (seletor, message) {
  return {
    selector: seletor,
    test: function (value) {
      return value.trim() ? undefined : message || "Please enter this field";
    },
  };
};

Validator.isUsername = function (seletor, message) {
  return {
    selector: seletor,
    test: function (value) {
      var regex = /^[A-Za-z][A-Za-z0-9]{5,31}$/;
      return regex.test(value)
        ? undefined
        : message ||
            "Username must contain at least 6 characters, including uppercase, lowercase and numbers";
    },
  };
};

Validator.isEmail = function (seletor, message) {
  return {
    selector: seletor,
    test: function (value) {
      var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      return regex.test(value) ? undefined : message || "Email is incorrect";
    },
  };
};

Validator.isPassword = function (seletor, message) {
  return {
    selector: seletor,
    test: function (value) {
      var regex =
        /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
      return regex.test(value)
        ? undefined
        : message ||
            "Password must contain at least 8 characters, including uppercase, lowercase, numbers and special characters";
    },
  };
}; 