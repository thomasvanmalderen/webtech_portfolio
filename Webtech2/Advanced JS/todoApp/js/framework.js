/* ---------------------------------------- FRAMEWORK ---------------------------------- */
var WrapperElement = function(element)
{
    // a wrapper element allow us to extend html dom functionality
    // without changing the behaviour of built-in elements
	
    // this contains the actual selection
    this.element = element;									
    
    // this allows us to see if a selection contains one or more elements
    if(element.length > 1)
    {
        this.isArray = true;
    }
    else
    {
        this.isArray = false;
    }
}

WrapperElement.prototype.toggleClass = function(className)
{
    if( this.isArray ){

        for( var i=0; i<this.el.length; i++ ){
            
            if(this.element[i].className == "prior-high"){
                this.element[i].className = "done";
            } else if(this.element[i].className == "done") {
                this.element[i].className = "prior-high";
            } else {
                this.element[i].className = "done";
            }
        }
    }
    else{

        if(this.element.className == "prior-high"){
                this.element.className = "done";
            } else if(this.element.className == "done") {
                this.element.className = "prior-high";
            } else {
                this.element.className = "done";
            }
        
        //this.element.className = "done";
    }
}

WrapperElement.prototype.addClass = function(className)
{
	if(this.isArray)
	{
        // multiple elements, we'll need to loop
		for(var i = 0; i<this.element.length; i++)
		{
			this.element[i].className += " " + className;
		}
	}
	else
	{
        // just one element, so we can manipulate it without looping
		this.element.className = className;
	}
    // return the original WrapperElement, so that we can chain multiple functions like $("li").addClass("test").toggleClass("something");
	return this;
}

WrapperElement.prototype.prepend = function(item)
{
    if( this.isArray ){
        for( var i=0; i<this.el.length; i++ ){
            //Nieuw child item maken
            this.element[i].appendChild(item);
        }
    }
    else{
        //Nieuw child item maken
        this.element[0].appendChild(item);
    }
}

WrapperElement.prototype.keyup = function(action, callback){
	if(this.isArray) //indien array
	{
		// voor elk array item:
		for(var i = 0; i<this.element.length; i++)
		{
            // event trigger maken, met de actie en de in te geven functie
			this.element[i].addEventListener(action, callback);
            
		}
	}
	else //indien geen array
	{
		// event trigger maken, met de actie en de in te geven functie
		this.element[0].addEventListener(action, callback);
	}
	return this;
}

WrapperElement.prototype.click = function(action, callback)
{
    if( this.isArray ){
        for( var i=0; i<this.element.length; i++ ){
            this.element[i].addEventListener(action, callback);
        }
    }
    else{
        this.element.addEventListener(action, callback);
    }
}

WrapperElement.prototype.val = function(value)
{
	if( this.isArray ){
        for( var i=0; i<this.element.length; i++ ){
            //Waarde teruggeven (voor inhoud listitems en textbox)
            return this.element[i].value;
        }
    }
    else{
        //Waarde teruggeven (voor inhoud listitems en textbox)
        return this.element.value;
    }
}



var $ = function(selector)
{
	// check if selector is an object already e.g. by passing 'this' on clicks
	if(typeof(selector) == "object")
	{
		return new WrapperElement(selector);
	}

    var selectedItems = document.querySelectorAll(selector);
	var newElement = new WrapperElement(selectedItems);
	return newElement;
}