/*
 * domus.Link :: PHP Web-based frontend for Heyu (X10 Home Automation)
 * Copyright (c) 2007, Istvan Hubay Cebrian (istvan.cebrian@domus.link.co.pt)
 * Project's homepage: http://domus.link.co.pt
 * Project's dev. homepage: http://domuslink.googlecode.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope's that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details. You should have 
 * received a copy of the GNU General Public License along with
 * this program; if not, write to the Free Software Foundation, 
 * Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 */
package com.domuslink.api;

import org.json.JSONArray;
import org.json.JSONObject;

import android.content.Context;
import android.util.Log;

import com.domuslink.communication.ApiHandler;
import com.domuslink.elements.Alias;

public class DomusHandler {
	private String hostPath = null;
	private String authPass = null;
	private boolean visible = true;
	private Context c;
    private static final String TAG = "DomusLink.DomusHandler";
    private static final String[] EMPTY_LIST = {"none"};
    
    // Used for DomusAsyncTask to call the correct method
    public static final int GET_FLOOR_PLAN = 0;
    public static final int GET_ALIAS_STATE = 1;
    public static final int GET_ALIASES_BY_LOCATION = 2;
    public static final int DIM_ALIAS = 3;
    public static final int TURN_ON_ALIAS = 4;
    public static final int TURN_OFF_ALIAS = 5;
    public static final int GET_INITIAL = 6;


	public DomusHandler(Context theContext, String host, String auth, boolean visible)
	{
		this.hostPath = host;
		this.authPass = auth;
		this.visible = visible;
		this.c = theContext;
	}

	public String[] getFloorPlan() throws Exception
	{
    	JSONArray theList = null;
    	JSONObject theResponse = null;
    	String[] theFloorPlan;


        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	if(this.visible)
	        		theResponse = ApiHandler.getPageContent("floorplan", "true");
	        	else
	        		theResponse = ApiHandler.getPageContent("floorplan", "false");
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error getting floorplan page content at "+this.hostPath, e);
	            throw e;
	        }
	        
        	try {
        		theList = theResponse.getJSONArray("floorplan");
        	}
        	catch(Exception e)
        	{
                Log.e(TAG, "Error getting floorplan from JSONObject", e);
                throw e;
        	}
	        theFloorPlan = new String[theList.length()];
	        for(int i = 0; i < theList.length(); i++) {
	        	try {
	        		theFloorPlan[i] = theList.getString(i);
	        	}
	        	catch(Exception e)
	        	{
	                Log.e(TAG, "Error getting floorplan from JSONArray", e);
	                throw e;
	        	}
	        }
        }
        else
        	theFloorPlan = EMPTY_LIST;
        
        return theFloorPlan;
	}

	public void getAliasState(Alias theAlias) throws Exception
	{
    	JSONObject theResponse = null;
    	Integer[] theStates = new Integer[2];


        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	theResponse = ApiHandler.getPageContent("aliasstate", theAlias.getHouseDevice());
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error getting aliasstate page content at "+this.hostPath, e);
	            throw e;
	        }
	        
        	try {
        		theAlias.setState(theResponse.getInt("state"));
        		theAlias.setDimLevel(theResponse.getInt("level"));
        	}
        	catch(Exception e)
        	{
                Log.e(TAG, "Error getting alias state value from JSONObject", e);
                throw e;
        	}
       }
        else
        {
        	theStates[0] = new Integer(0);
        	theStates[1] = new Integer(0);
        }
	}
	
	public Alias[] getAliasesByLocation(String theLocation) throws Exception
	{
    	JSONArray theList = null;
    	JSONObject theResponse = null;
    	Alias[] theAliases;

//    	Log.i(TAG, "Entering DomusHandler.getAliasesByLocation: "+theLocation);
        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	if(this.visible)
	        		theResponse = ApiHandler.getPageContent("location", theLocation+"/true");
	        	else
	        		theResponse = ApiHandler.getPageContent("location", theLocation+"/false");
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error getting location page content at "+this.hostPath, e);
	            throw e;
	        }
	        
        	try {
        		theList = theResponse.getJSONArray(theLocation);
        	}
        	catch(Exception e)
        	{
                Log.e(TAG, "Error getting aliases on location from JSONObject", e);
                throw e;
        	}

	        theAliases = new Alias[theList.length()];
	        for(int i = 0; i < theList.length(); i++) {
	        	try {
	        		theAliases[i] = new Alias(theList.getJSONObject(i));
	        		getAliasState(theAliases[i]);
	        	}
	        	catch(Exception e)
	        	{
	                Log.e(TAG, "Error getting aliases from JSONArray", e);
	                throw e;
	        	}
	        }
        }
        else
        	theAliases = null;
        
//    	Log.d(TAG, "At DomusHandler.getAliasesByLocation return, Alias list length is "+theAliases.length);
       return theAliases;
		
	}
	
	public void dimAlias(Alias theAlias, int theRequestLevel) throws Exception {
    	JSONObject theResponse = null;
//    	Log.d(TAG, "At DomusHandler.dimAlias from "+theAlias.getDimLevel()+" to requested "+theRequestLevel);
        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	theResponse = ApiHandler.postPageContent("dimbright", theAlias.getLabel()+"/"+theAlias.getStringState()+"/"+theAlias.getDimLevel()+"/"+theRequestLevel);
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error setting on page content at "+this.hostPath+" for alias "+theAlias.getLabel(), e);
	            throw e;
	        }
	       theAlias.setDimLevel(theRequestLevel);
	       if(theRequestLevel == 0)
	    	   theAlias.setState(0);
	       else if(theRequestLevel > 0)
	    	   theAlias.setState(1);
       }
	}

	public void turnOnAlias(Alias theAlias) throws Exception {
    	JSONObject theResponse = null;
//    	Log.d(TAG, "At DomusHandler.turnOnAlias from current state "+theAlias.getState()+" to on");
        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	theResponse = ApiHandler.postPageContent("on", theAlias.getLabel());
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error setting on page content at "+this.hostPath+" for alias "+theAlias.getLabel(), e);
	            throw e;
	        }
	        theAlias.setState(1);
	        theAlias.setDimLevel(100);
       }
	}

	public void turnOffAlias(Alias theAlias) throws Exception {
    	JSONObject theResponse = null;
//    	Log.d(TAG, "At DomusHandler.turnOffAlias from current state "+theAlias.getState()+" to off");
        if(this.hostPath != null || this.hostPath.length() != 0) {
	        ApiHandler.prepareUserAgent(this.c, authPass, hostPath);
	        try {
	        	theResponse = ApiHandler.postPageContent("off", theAlias.getLabel());
	        }
	        catch(Exception e) {
	            Log.e(TAG, "Error setting on page content at "+this.hostPath+" for alias "+theAlias.getLabel(), e);
	            throw e;
	        }
	        theAlias.setState(0);
	        theAlias.setDimLevel(0);
       }
        
	}
}