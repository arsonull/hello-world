package business;
import java.util.List;

import javax.ejb.Local;

import beans.User;

@Local
public interface UserBusinessInterface {
	public void test();

    //the usual getters and setters
    public void setUsername(String name);
    public void setPassword(String pword);
    public String getUsername();
    public String getPassword();
}
