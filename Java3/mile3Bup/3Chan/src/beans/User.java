package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@ManagedBean
@ViewScoped
public class User{
	@NotNull(message = "You FOOL..... You triggered my trap card by not entering the username, allowing me to place any card from my deck. I place the card POT OF GREED!")
	@Size(min=4,max=15)
    String username = "";
	@NotNull(message = "You FOOL..... You triggered my trap card by not entering the password, allowing me to place any card from my deck. I place the card POT OF GREED!")
	@Size(min=4,max=15)
    String password = "";
    String first_name ="";
    String last_name = "";
    int age = 0;
    public User() {
        username = "user";
        password = "password";
    }

	public String getUsername() {
		return username;
	}

	public void setUsername(String username) {
		this.username = username;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

    

}