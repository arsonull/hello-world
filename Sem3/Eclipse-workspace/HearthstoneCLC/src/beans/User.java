package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@ManagedBean
@ViewScoped
public class User {
	@NotNull(message = "Please enter your first name! Between 3-25 characters. Required Field!")
	@Size(min=3, max=25)
	String firstName;
	
	@NotNull(message = "Please enter your last name! Between 3-25 characters. Required Field!")
	@Size(min=3, max=25)
	String lastName;
	
	@NotNull(message = "Please enter your email! Between 3-25 characters. Required Field!")
	@Size(min=3, max=25)
	String email;
	
	@NotNull(message = "Please enter a username! Between 3-25 characters. Required Field!")
	@Size(min=3, max=25)
	String username;
	
	@NotNull(message = "Please enter a password! Between 3-25 characters. Required Field!")
	@Size(min=3, max=25)
	String password;

	public User() {
		firstName = "";
		lastName = "";
		email = "";
		username = "";
		password = "";
	}
	
	public User(String firstName, String lastName, String email, String username, String password) {
		this.firstName = firstName;
		this.lastName = lastName;
		this.email = email;
		this.username = username;
		this.password = password;
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

	public String getEmail() {
		return email;
	}
	public void setEmail(String email) {
		this.email = email;
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
