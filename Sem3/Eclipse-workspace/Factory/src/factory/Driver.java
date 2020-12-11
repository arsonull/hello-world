package factory;

public class Driver
{

	public static void main(String[] args)
	{
		WeaponFactory factory = new WeaponFactory();
		
		WeaponInterface weapon1 = factory.getWeapon("Kalashnikov");
		WeaponInterface weapon2 = factory.getWeapon("Mosin-Nagant");
		WeaponInterface weapon3 = factory.getWeapon("Steyr Aug A3");
		
		weapon1.fire();
		weapon1.fire();
		weapon1.reload();
		weapon1.fire();
		weapon2.fire();
		weapon2.fire();
		weapon2.reload();
		weapon2.fire();
		weapon3.fire();
		weapon3.fire();
		weapon3.reload();
		weapon3.fire();
	}

}
