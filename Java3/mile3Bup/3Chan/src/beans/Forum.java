package beans;

import javax.faces.bean.ManagedBean;
import javax.faces.bean.ViewScoped;
import javax.validation.constraints.NotNull;
import javax.validation.constraints.Size;

@ManagedBean
@ViewScoped
public class Forum
{
    String name = "";
    public Forum(String n) 
    {
        name = n;
    }

	public String getName() 
	{
		return name;
	}
}
