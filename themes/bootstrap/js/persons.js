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


    var Engine = function (_model, _status) {
        this.model = _model;
        this.status = _status;
    }

    Engine.prototype.starting = function () {
        console.log('Запуск двигателя.');
        setTimeout(function() { this.status = 'working...'; alert('Двигатель ' + this.model + ' запущен') }, 1500);
    }

    Engine.prototype.stopping = function () {
        console.log('Остановка двигателя.');
        setTimeout(function() { this.status = 'off...'; alert('Двигатель ' + this.model +' остановлен') }, 1000);
    }

    var engine1 = new Engine('YMZ125', 'off');
    engine1.starting();
    // engine1.stopping();

})(window.jQuery, window._);