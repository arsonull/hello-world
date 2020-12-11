package factory;


public class Kalashnikov implements WeaponInterface {

	private int ammo;
	
	public Kalashnikov()
	{
		ammo = 0;
	}
	@Override
	public void fire()
	{
		jam();
		if (hasAmmo())
		{
			System.out.println("Firing!! I have " + ammo + " shots left!");
		}
		else
		{
			System.out.println("Out of ammo");
			reload();
		}
	}

	@Override
	public void reload()
	{
		System.out.println("Reloading!!");
		if (!hasAmmo())
		{
			ammo = 30;
		}
		else
		{
			ammo = 31;
		}
		System.out.println("I'm ready to go!");
	}
	@Override
	public boolean hasAmmo()
	{
		if (ammo > 0) return true;
		else return false;
	}
	@Override
	public void jam()
	{
		int i = (int) Math.random();
		if (i % 10 != 0) System.out.println("Gun jammed!!"); reload();
	}

}
