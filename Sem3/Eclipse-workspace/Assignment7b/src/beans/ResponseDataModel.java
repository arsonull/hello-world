package beans;

import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlAccessType;

//This is a DTO
@XmlRootElement(name="Response")
@XmlAccessorType(XmlAccessType.FIELD)
public class ResponseDataModel extends ResponseModel
{
	private Album data;
	
	public ResponseDataModel()
	{
		super(0, "");
		this.data = null;
	}
	
	public ResponseDataModel(int stat, String mes, Album data)
	{
		super(stat, mes);
		this.data = data;
	}
	
	public Album getData()
	{
		return this.data;
	}
	public void setData(Album alb)
	{
		this.data = alb;
	}
}
