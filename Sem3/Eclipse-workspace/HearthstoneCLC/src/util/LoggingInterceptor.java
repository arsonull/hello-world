package util;

import java.io.Serializable;

import javax.interceptor.AroundInvoke;
import javax.interceptor.Interceptor;
import javax.interceptor.InvocationContext;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;


@Interceptor
public class LoggingInterceptor implements Serializable{

	private static final long serialVersionUID = 1L;
	private static Logger logger = LoggerFactory.getLogger(LoggingInterceptor.class);
	
	@AroundInvoke
	public Object methodInterceptor(InvocationContext ctx) throws Exception{
		
		//Where logger will go
        logger.info("************** Intercepting call method: " + ctx.getTarget().getClass() + "." + ctx.getMethod().getName() + "()");
		
		return ctx.proceed();
	}
	
	//private constructor so singleton class can't be initialized  
	private LoggingInterceptor(){}
	
    public Object warn(InvocationContext context ) throws Exception{
        logger.warn("Warning found within: " + context.getMethod().getName());
        return context.proceed();
    }  
    
    public Object error(InvocationContext context ) throws Exception{
        logger.error("Error found within: " + context.getMethod().getName());
        return context.proceed();
    }

    public Object debug(InvocationContext context ) throws Exception{
        logger.debug("Debug runnning within: " + context.getMethod().getName());
        return context.proceed();
    }

}