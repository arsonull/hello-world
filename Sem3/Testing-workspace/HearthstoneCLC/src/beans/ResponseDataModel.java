package beans;

import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlAccessType;

//This is a DTO
@XmlRootElement(name="Response")
@XmlAccessorType(XmlAccessType.FIELD)
public class ResponseDataModel extends ResponseModel
{
	private Cards data;
	
	public ResponseDataModel()
	{
		super(0, "");
		this.data = null;
	}
	
	public ResponseDataModel(int stat, String mes, Cards data)
	{
		super(stat, mes);
		this.data = data;
	}
	
	public Cards getData()
	{
		return this.data;
	}
	public void setData(Cards cards)
	{
		this.data = cards;
	}
}
