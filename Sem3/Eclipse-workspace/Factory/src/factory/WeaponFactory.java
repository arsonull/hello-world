package factory;

public class WeaponFactory
{
	public WeaponInterface getWeapon(String name)
	{
		if(name == "Kalashnikov") return new Kalashnikov();
		else if(name == "Mosin-Nagant") return new MosinNagant();
		else if(name == "Steyr Aug A3") return new SteyrAugA3();
		else return null;
	}
}