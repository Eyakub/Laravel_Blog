@extend('master')
@section('main_content')

<div class='contact'>
    <div class="container">
        <div class="contact-head">
            <h3>CONTACT</h3>
            <form>
                <div class="col-md-6 contact-left">
                    <input type="text" placeholder="Name" required/>
                    <input type="text" placeholder="E-mail" required/>
                    <input type="text" placeholder="Phone" required/>
                </div>
                <div class="col-md-6 contact-right">
                    <textarea placeholder="Message"></textarea>
                    <input type="submit" value="SEND"/>
                </div>
                <div class="clearfix"></div>
            </form>
        </div>
        <div class="address">
            <h3>Our Locations</h3>
            <div class="col-md-6 locations">				 
                <ul>
                    <li><span></span></li>					 					
                    <li>
                        <div class="address-info">	
                            <h4>New York, Washington</h4>
                            <p>10-765 MD-Road</p>
                            <p>Washington, DC, United States,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>	
                        </div>
                    </li>				
                </ul>	
                <ul>
                    <li><span></span></li>					 					
                    <li>
                        <div class="address-info">	
                            <h4>London, UK</h4>
                            <p>10-765 MD-Road</p>
                            <p>Lorem ipsum, domon sit, UK,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>	
                        </div>
                    </li>				
                </ul>		
            </div>
            <div class="col-md-6 locations">				 
                <ul>
                    <li><span></span></li>					 					
                    <li>
                        <div class="address-info">	
                            <h4>Brazil, SouthAmerica</h4>
                            <p>10-765 MD-Road</p>
                            <p>Argentina,Filps Road</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>	
                        </div>
                    </li>				
                </ul>	
                <ul>
                    <li><span></span></li>					 					
                    <li>
                        <div class="address-info">	
                            <h4>San Francisco, California</h4>
                            <p>10-765 MD-Road</p>
                            <p>Lorem ipsum, domon sit, California,</p>
                            <p>Phone: 123 456 7890</p>
                            <p>Mail: <a href="mailto:info@example.com">info(at)example.com</a></p>
                            <h5><a href="">Visit on Google Maps >></a></h5>	
                        </div>
                    </li>				
                </ul>		
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection