(function ($, _) {
    "use strict";

    var Person = function(name) {
        this.name = name;
    }

    Person.prototype.greet = function() {
        console.log('Hello, my name is ' + this.name);
    }

    var Developer = function (name, skills, status) {
        Person.apply(this, arguments);
        this.skills = skills || [];
        this.status = status;
    }

    Developer.prototype = Object.create(Person.prototype);
    Developer.prototype.constructor = Developer;

    Developer.prototype.getStatus = function() {
        console.log('Status is ' + this.status);
    }

    var developerFirst = new Developer('Maksim', ['php', 'js', 'html', 'css'], 'busy');
    developerFirst.greet();
    console.log(developerFirst.skills);
    developerFirst.getStatus();

    var person = new Person('Max');
    console.log(person.name);
    person.greet();

})(window.jQuery, window._);