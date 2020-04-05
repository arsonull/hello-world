package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@ManagedBean
@ViewScoped
public class User 
{
	@NotNull(message = "This ain't the military, enter your first name!")
	@Size(min=2,max=20)
    String firstName = "";
	@NotNull(message = "You fool of a Took! You didn't enter your last name!")
	@Size(min=2,max=20)
    String lastName = "";
    
    public User() 
    {
        firstName = "Carson";
        lastName = "Perry";
    }

    public String getFirstName() {
        return firstName;
    }

    public void setFirstName(String firstName) {
        this.firstName = firstName;
    }

    public String getLastName() {
        return lastName;
    }

    public void setLastName(String lastName) {
        this.lastName = lastName;
    }

}