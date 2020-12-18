package business;

import beans.SampleCardInterface;
import beans.SampleJaraxxus;
import beans.SampleLeeroy;
import beans.SampleTirion;

public class SampleCardFactory
{
	public SampleCardInterface getSampleCard(String s)
	{
		if (s == "Leeroy") return new SampleLeeroy();
		else if (s == "Jaraxxus") return new SampleJaraxxus();
		else if (s == "Tirion") return new SampleTirion();
		else return null;
	}
}
